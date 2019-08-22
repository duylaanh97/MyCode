import { Component, OnInit } from '@angular/core';
import { Payment } from './model/payment.model';
import { PaymentService } from 'src/app/payment/payment/payment.service';
import { PaymentSearchRequest } from './dto/payment-search.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { BehaviorSubject } from 'rxjs';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { AouPaymentComponent } from './aou-payment/aou-payment.component';
import { ChangePaymentStatus } from './dto/payment-change-status.model';


@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css'],
  // providers: [PayService]
})
export class PaymentComponent implements OnInit {

  paymentSearchRequest: PaymentSearchRequest;
  paymentBehavior$: BehaviorSubject<PaymentSearchRequest> = new BehaviorSubject<PaymentSearchRequest>({} as PaymentSearchRequest);

  cols: any[];
  payemnt: Payment;
  payments: Payment[];
  totalRecords = 0;
  pageSize = 10;
  keyword = '';

  // add and edit
  dialogTitle: string;
  displayDialog = false;

  constructor(
    private paymentService: PaymentService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private configmationService: ConfirmationService
  ) { }

  ngOnInit() {
    // this.paymentService.getpayment().then(payments => {
    //   console.log(payments);
    //   this.payments = payments;
    // });

    // make colums
    this.cols = [
      { field: 'username', header: 'Họ Tên' },
      { field: 'phone', header: 'SĐT' },
      { field: 'detail', header: 'Chi Tiết Khám Chữa' },
      { field: 'services', header: 'Dịch vụ đã sử dụng' },
      { field: 'maindoctor', header: 'Bác Sĩ Chính' },
      { field: 'extradoctor', header: 'Bác Sĩ Phụ' },
      { field: 'price', header: 'Phí Dịch Vụ' },
      { field: 'paid', header: 'Phí Đã Thanh Toán' },
      { field: 'unpaid', header: 'Phí Chưa Thanh Toán' },
      { field: 'payments', header: 'Hình Thức Thanh Toán' }
    ];

    // this.cols2 = [
    //   { field: 'stt', header: 'STT' },
    //   { field: 'ngayKham', header: 'Ngày Khám Chữa' },
    //   { field: 'chiTiet', header: 'Chi Tiết Khám Chữa' },
    //   { field: 'dichVu', header: 'Dịch vụ đã sử dụng' },
    //   { field: 'bacSiChinh', header: 'Bác Sĩ Chính' },
    //   { field: 'bacSiPhu', header: 'Bác Sĩ Phụ' },
    //   { field: 'phiDichVu', header: 'Tổng Chi Phí' },
    //   { field: 'phiDaThanhToan', header: 'Phí Đã Thanh Toán' },
    //   { field: 'phiChuaThanhToan', header: 'Phí Chưa Thanh Toán' }
    // ];

    // this.cols3 = [
    //   { field: 'stt', header: 'STT' },
    //   { field: 'dichVu', header: 'Dịch Vụ' },
    //   { field: 'donGia', header: 'Đơn Giá' },
    //   { field: 'soLuong', header: 'Số Lượng' },
    //   { field: '', header: 'Thành Tiền' },
    //   { field: '', header: 'Bác Sĩ Chính' },
    //   { field: '', header: 'Bác Sĩ Phụ' }
    // ];

    // get list physician from api
    this.paymentSearchRequest = new PaymentSearchRequest();
    this.paymentBehavior$.asObservable().subscribe(( paymentSearchRequest: PaymentSearchRequest) => {
      return this.paymentService.listPayment(this.paymentSearchRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.payments = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.payments = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.paymentSearchRequest.pageIndex = event.page;
    this.paymentSearchRequest.pageSize = event.rows;
    this.paymentBehavior$.next(this.paymentSearchRequest);
  }

  prepareAddPayment(event: any) {
    const ref = this.dialogService.open(AouPaymentComponent, {
      header: 'Chi Tiết Thanh Toán',
      width: '80%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Cập nhật Bác Sĩ');
    });
  }

  searchPayment() {
    this.paymentSearchRequest.username = this.keyword;
    this.paymentBehavior$.next(this.paymentSearchRequest);
  }

  changeStatus(selectedpayment: any) {
    // tslint:disable-next-line: no-shadowed-variable
    const ChangePaymentStatuss = new ChangePaymentStatus();
    ChangePaymentStatuss.id = selectedpayment.id;
    ChangePaymentStatuss.status = selectedpayment.status === 1 ? 2 : 1;
    this.configmationService.confirm({
      message: 'Bạn có chắc chắn muốn thay đổi trạng thái bác sĩ này?',
      accept: () => {
        this.paymentService.changeStatus(ChangePaymentStatuss).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái bác sĩ');
        });
      }
    });
  }

  confirmDeleted(selectedpayment: any) {
    console.log(selectedpayment);
    this.configmationService.confirm({
      message: 'Bạn có chắc muốn xóa Bác Sĩ này? ',
      accept: () => {
        this.paymentService.changeStatus(selectedpayment.id).subscribe(response => {
          this.showMessage(response, 'Xóa Bác sĩ');
        });
      }
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.paymentBehavior$.next(this.paymentSearchRequest);
      } else {
        this.messageService.add({ severity: 'error ', summary: summary, detail: result.statusMessage });
      }
    }
  }

  // them() {
  //   this.newPayment = true;
  //   this.payment = {};
  //   this.displayDialogadd = true;
  // }
  // xem() {
  //   this.displayDialogls = true;
  // }
  // save() {
  //   const payments = [...this.payments];
  //   if (this.newPayment) {
  //     payments.push(this.payment);
  //   } else {
  //   payments[this.payments.indexOf(this.selectedpayment)] = this.payment;
  //   }

  //   this.payments = payments;
  //   this.payment = null;
  //   this.displayDialog = false;
  //   window.alert('Lưu Thành Công');

  // }
  // delete() {
  //   const index = this.payments.indexOf(this.selectedpayment);
  //   console.log(index);
  //   this.payments = this.payments.filter((val, i) => i !== index);
  //   this.payment = null;
  //   this.displayDialog = false;
  // }
  // sua() {
  //   this.newPayment = false;
  //   // this.payment = this.cloneCar(event.data);
  //   this.displayDialog = true;

  // }

  // onRowSelect(event) {
  //   this.newPayment = false;
  //   this.payment = this.cloneCar(event.data);
  //   this.select = true;
  //   this.displayDialog = true;
  // }
  // xoa() {
  //   if (this.select) {
  //     const index = this.payments.indexOf(this.selectedpayment);
  //     console.log(index);
  //     this.payments = this.payments.filter((val, i) => i !== index);
  //     this.payment = null;
  //     this.displayDialog = false;
  //     this.select = false;
  //   } else {
  //     window.alert('Vui Lòng Chọn Bác Sĩ');
  //   }

  // }
  // cloneCar(c: Payment): Payment {
  //   const payment = {};
  //   // tslint:disable-next-line:forin
  //   for (const prop in c) {
  //     payment[prop] = c[prop];
  //   }
  //   return payment;
  // }


}
