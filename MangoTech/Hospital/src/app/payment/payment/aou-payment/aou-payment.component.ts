import { Component, OnInit } from '@angular/core';
import { PaymentService } from '../payment.service';
import { DynamicDialogRef, DynamicDialogConfig } from 'primeng/api';
import { Payment } from '../model/payment.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';

@Component({
  selector: 'app-aou-payment',
  templateUrl: './aou-payment.component.html',
  styleUrls: ['./aou-payment.component.css']
})
export class AouPaymentComponent implements OnInit {

  payment: Payment;
  statusLabel: string;
  status: boolean;
  mode: number;

  constructor(
    private paymentService: PaymentService,
    public ref: DynamicDialogRef,
    public config: DynamicDialogConfig
  ) { }

  ngOnInit() {
    if (!this.config.data) {
      this.payment = new Payment();
      this.mode = 0;
    } else {
      this.payment = {...this.config.data.payment};
      this.mode = 1;
      this.status = this.payment.status === 1 ? true : false;
    }
    console.log(this.payment);
    // init status
    this.status = true;
    this.statusLabel = 'Đang hoạt động';
  }

  changeStatus() {
    this.statusLabel = this.status ? 'Đang hoạt động' : 'Ngừng hoạt động';
  }

  save() {
    this.payment.status = this.status ? 1 : 2;
    if (this.mode === 0) {
      this.payment.created = new Date().getTime();
      this.paymentService.addPayment(this.payment).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
    if (this.mode === 1) {
      this.paymentService.updatePayment(this.payment).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
  }

  cancel() {
    this.ref.close();
  }

}
