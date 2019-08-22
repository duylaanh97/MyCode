import { Component, OnInit } from '@angular/core';
import { CustomerModel } from '../model/customer.model';
import { CustomerService } from '../customer.service';
import { DynamicDialogRef, DynamicDialogConfig } from 'primeng/api';
import { RESPONSE } from 'src/app/shared/resources/response.resource';

@Component({
  selector: 'app-customer-dialog',
  templateUrl: './customer-dialog.component.html',
  styleUrls: ['./customer-dialog.component.css']
})
export class CustomerDialogComponent implements OnInit {

  customer: CustomerModel;
  statusLabel: string;
  status: boolean;
  mode: number;

  genders = [
    { label: 'Nam', value: 1 },
    { label: 'Nữ', value: 2 }
  ];
  services = [
    { label: 'Dịch vụ A', value: 'DV1' },
    { label: 'Dịch vụ B', value: 'DV2' },
    { label: 'Dịch vụ C', value: 'DV3' }
  ];

  constructor(
    private customerService: CustomerService,
    public ref: DynamicDialogRef,
    public config: DynamicDialogConfig
  ) { }

  ngOnInit() {
    if (!this.config.data) {
      this.customer = new CustomerModel();
      this.mode = 0;
    } else {
      this.customer = { ...this.config.data.customer };
      this.mode = 1;
      this.status = this.customer.status === 1 ? true : false;
    }
    console.log(this.customer);
    this.status = true;
    this.statusLabel = 'Đang hoạt động';
  }

  changeStatus() {
    this.statusLabel = this.status ? 'Đang hoạt động' : 'Ngừng hoạt động';
  }

  save() {
    this.customer.status = this.status ? 1 : 2;
    if (this.mode === 0) {
      this.customer.created = new Date().getTime();
      this.customerService.addCustomer(this.customer).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
    if (this.mode === 1) {
      this.customerService.updateCustomer(this.customer).subscribe(response => {
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
