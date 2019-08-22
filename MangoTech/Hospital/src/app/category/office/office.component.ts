import { Component, OnInit } from '@angular/core';
import { OfficeModel } from './model/office.model';
import { OfficeSearchRequest } from './dto/office-search.model';
import { OfficeService } from './office.service';
import { RESPONSE } from '../../shared/resources/response.resource';
import { BehaviorSubject } from 'rxjs';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { AouOfficeComponent } from './aou-office/aou-office.component';
import { ChangeOfficeStatus } from './dto/office-change-status.model';
import { PAGE_CONFIG } from '../../shared/resources/config.resource';
import { max } from 'rxjs/operators';


@Component({
  selector: 'app-office',
  templateUrl: './office.component.html',
  styleUrls: ['./office.component.css']
})
export class OfficeComponent implements OnInit {

  officeSearhRequest: OfficeSearchRequest;
  officeBehavior$: BehaviorSubject<OfficeSearchRequest> = new BehaviorSubject<OfficeSearchRequest>({} as OfficeSearchRequest);

  cols: any[];
  offices: OfficeModel[];
  totalRecords = PAGE_CONFIG.totalRecords;
  pageSize = PAGE_CONFIG.defaultPageSize;
  keyword = '';

  // add and edit
  dialogTitle: string;

  constructor(
    private officeService: OfficeService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private confirmationService: ConfirmationService
  ) { }

  ngOnInit() {
    // make colums
    this.cols = [
      { field: 'officeName' , header: 'Tên cơ sở'},
      { field: 'address' , header: 'Địa chỉ'},
      { field: 'phone' , header: 'SĐT'},
      { field: 'email' , header: 'Email'},
      { field: 'mangement' , header: 'Quản lý'}
    ];

    // get list office from api
    this.officeSearhRequest = new OfficeSearchRequest();
    this.officeBehavior$.asObservable().subscribe((officeSearhRequest: OfficeSearchRequest) => {
      return this.officeService.listOffice(this.officeSearhRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.offices = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.offices = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.officeSearhRequest.pageIndex = event.page;
    this.officeSearhRequest.pageSize = event.rows;
    this.officeBehavior$.next(this.officeSearhRequest);
  }

  prepareAddOffice(event: any) {
    const ref = this.dialogService.open(AouOfficeComponent, {
      header: 'Thêm mới cơ sở',
      width: '60%',
      height: '100%',
      contentStyle: { 'overflow': 'scroll' , 'max-height' : '100%'},
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Thêm mới sơ sở');
    });
  }

  selectOffice(selectedOffice: any) {
    const ref = this.dialogService.open(AouOfficeComponent, {
      data: {
        group: selectedOffice
      },
      header: 'Chỉnh sửa cơ sở',
      width: '50%',
      contentStyle: { 'overflow': 'scroll' , 'max-height' : '100%' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      console.log(result);
      this.showMessage(result, 'Cập nhật cơ sở');
    });
  }

  searchOffices() {
    this.officeSearhRequest.officeName = this.keyword;
    this.officeBehavior$.next(this.officeSearhRequest);
  }

  changeStatus(selectedOffice: any) {
    const changeOfficeStatus = new ChangeOfficeStatus();
    changeOfficeStatus.id = selectedOffice.id;
    changeOfficeStatus.status = selectedOffice.status === 1 ? 2 : 1;
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn thay đổi trạng thái cơ sở này?',
      accept: () => {
        this.officeService.changeStatus(changeOfficeStatus).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái nhóm người dùng');
        });
      }
    });
  }

  confirmDeleted(selectedOffice: any) {
    console.log(selectedOffice);
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn xóa cơ sở này?',
      accept: () => {
        this.officeService.deleteOffice(selectedOffice.id).subscribe(response => {
          this.showMessage(response, 'Xóa cơ sở');
        });
      }
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.officeBehavior$.next(this.officeSearhRequest);
      } else {
        this.messageService.add({ severity: 'error', summary: summary, detail: result.statusMessage });
      }
    }
  }

}
