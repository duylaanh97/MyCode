import { Component, OnInit } from '@angular/core';
import { CustomerService } from './customer.service';
import { CustomerModel } from './model/customer.model';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { CustomerDialogComponent } from './customer-dialog/customer-dialog.component';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { CustomerSearchRequest } from './dto/customer-search.model';
import { BehaviorSubject } from 'rxjs';
import { CustomerChangeStatus } from './dto/customer-changeStatus.model';
import * as jsPDF from 'jspdf';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-customers',
  templateUrl: './customers.component.html',
  styleUrls: ['./customers.component.css'],
  providers: [DatePipe]
})
export class CustomersComponent implements OnInit {

  customerSearchRequest: CustomerSearchRequest;
  customerBehavior$: BehaviorSubject<CustomerSearchRequest> = new BehaviorSubject<CustomerSearchRequest>({} as CustomerSearchRequest);

  cols: any[];
  customers: CustomerModel[];
  customer: CustomerModel;
  totalRecords = 0;
  pageSize = 10;
  keyword = '';

  dialogTitle: string;
  displayDialog = false;

  constructor(
    private customerService: CustomerService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private confirmationService: ConfirmationService,
    private datePipe: DatePipe
  ) { }

  ngOnInit() {

    this.cols = [
      { field: 'username', header: 'Tên' },
      { field: 'birthDate', header: 'Ngày sinh', type: this.datePipe, arg1: 'medium' },
      { field: 'gender', header: 'Giới tính' },
      { field: 'job', header: 'Nghề nghiệp' },
      { field: 'phone', header: 'Điện thoại' },
      { field: 'servicesRequest', header: 'Dịch vụ yêu cầu' },
      { field: 'bookingDate', header: 'Ngày đăng ký', type: this.datePipe, arg1: 'medium' },
      { field: 'incomingDate', header: 'Ngày đến', type: this.datePipe, arg1: 'medium' }
    ];

    this.customerSearchRequest = new CustomerSearchRequest();
    this.customerBehavior$.asObservable().subscribe((customerSearchRequest: CustomerSearchRequest) => {
      return this.customerService.listCustomers(this.customerSearchRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.customers = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.customers = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.customerSearchRequest.pageIndex = event.page;
    this.customerSearchRequest.pageSize = event.rows;
    this.customerBehavior$.next(this.customerSearchRequest);
  }

  prepareAddCustomer(event: any) {
    const ref = this.dialogService.open(CustomerDialogComponent, {
      header: 'Thêm mới khách hàng',
      width: '50%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      console.log(result);
      this.showMessage(result, 'Thêm mới khách hàng');
    });
  }

  selectCustomer(selectedCustomer: any) {
    const ref = this.dialogService.open(CustomerDialogComponent, {
      data: {
        customer: selectedCustomer
      },
      header: 'Chỉnh sửa khách hàng',
      width: '50%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Cập nhập khách hàng');
    });
  }

  searchCustomer() {
    this.customerSearchRequest.customerName = this.keyword;
    this.customerBehavior$.next(this.customerSearchRequest);
  }

  changeStatus(selectedCustomer: any) {
    const changeCustomerStatus = new CustomerChangeStatus();
    changeCustomerStatus.id = selectedCustomer.id;
    changeCustomerStatus.status = selectedCustomer.status === 1 ? 2 : 1;
    this.confirmationService.confirm({
      message: 'Bạn có chắc muốn thay đổi trạng thái khách hàng này ?',
      accept: () => {
        this.customerService.changeStatus(changeCustomerStatus).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái khách hàng thành công');
        });
      }
    });
  }

  confirmDeleted(selectedCustomer: any) {
    console.log(selectedCustomer);
    this.confirmationService.confirm({
      message: 'Bọn có chắc muốn xóa khách hàng này?',
      accept: () => {
        this.customerService.changeStatus(selectedCustomer.id).subscribe(response => {
          this.showMessage(response, 'Xóa khách hàng');
        });
      }
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.customerBehavior$.next(this.customerSearchRequest);
      } else {
        this.messageService.add({ severity: 'error', summary: summary, detail: result.statusMessage });
      }
    }
  }

}
