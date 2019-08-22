import { Component, OnInit } from '@angular/core';
import { OfficeService } from '../office.service';
import { DynamicDialogRef, DynamicDialogConfig } from 'primeng/api';
import { OfficeModel } from '../model/office.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { Mangement } from '../model/mangement.model';

@Component({
  selector: 'app-aou-office',
  templateUrl: './aou-office.component.html',
  styleUrls: ['./aou-office.component.css']
})
export class AouOfficeComponent implements OnInit {

  office: OfficeModel;
  statusLabel: string;
  status: boolean;
  mode: number;
  mangements: Mangement[];
  selectedMangement: Mangement;

  constructor(
    private officeService: OfficeService,
    public ref: DynamicDialogRef,
    public config: DynamicDialogConfig
  ) { }

  ngOnInit() {

    // init mangement
    this.mangements = [
      {
        id: 1,
        name: 'Nguyễn Văn Quân'
      },
      {
        id: 2,
        name: 'Đào Thị Lý'
      },
      {
        id: 3,
        name: 'Ronaldo'
      },
    ];
    // init office
    if (!this.config.data) {
      this.office = new OfficeModel();
      this.mode = 0;
    } else {
      this.office = {...this.config.data.office};
      this.mode = 1;
      this.status = this.office.status === 1 ? true : false;
    }
    console.log(this.office);
    // init status
    this.status = true;
    this.statusLabel = 'Đang hoạt động';
  }

  changeStatus() {
    this.statusLabel = this.status ? 'Đang hoạt động' : 'Ngừng hoạt động';
  }

  save() {
    this.office.status = this.status ? 1 : 2;
    if (this.mode === 0) {
      this.office.created = new Date().getTime();
      this.officeService.addOffice(this.office).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
    if (this.mode === 1) {
      this.officeService.updateOffice(this.office).subscribe(response => {
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
