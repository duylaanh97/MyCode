import { Component, OnInit } from '@angular/core';
import { Physician } from './model/physician.model';
import { PhysicianService } from 'src/app/user/physician/physician.service';
import { PhysicianSearchRequest } from './dto/physician-search.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { BehaviorSubject } from 'rxjs';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { AouPhysicianComponent } from './aou-physician/aou-physician.component';
import { ChangePhysicianStatus } from './dto/physician-change-status.model';


@Component({
  selector: 'app-physician',
  templateUrl: './physician.component.html',
  styleUrls: ['./physician.component.css'],
  // providers: [PhysicianService]
})
export class PhysicianComponent implements OnInit {

  physicianSearchRequest: PhysicianSearchRequest;
  physicianBehavior$: BehaviorSubject<PhysicianSearchRequest> = new BehaviorSubject<PhysicianSearchRequest>({} as PhysicianSearchRequest);

  cols: any[];
  physician: Physician;
  physicians: Physician[];
  totalRecords = 0;
  pageSize = 10;
  keyword = '';

  // add and edit
  dialogTitle: string;
  displayDialog = false;

  constructor(
    private physicianService: PhysicianService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private configmationService: ConfirmationService
  ) { }

  ngOnInit() {
    //   this.PhysicianService.getphysician().then(physicians => {
    //   console.log(physicians);
    //   console.log(Array.isArray(physicians));
    //   this.physicians = physicians;
    // });

    // make colums
    this.cols = [
      { field: 'physicianName', header: 'Họ Tên' },
      { field: 'expertise', header: 'Chuyên Môn' },
      { field: 'salary', header: 'Tiền Lương' },
      { field: 'gender', header: 'Giới Tính' },
      { field: 'address', header: 'Địa Chỉ' },
      { field: 'phone', header: 'Số Điện Thoại' },
      { field: 'email', header: 'Email' },
      { field: 'description', header: 'Ghi Chú' },
    ];

    // get list physician from api
    this.physicianSearchRequest = new PhysicianSearchRequest();
    this.physicianBehavior$.asObservable().subscribe((physicianSearchRequest: PhysicianSearchRequest) => {
      return this.physicianService.listPhysician(this.physicianSearchRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.physicians = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.physicians = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.physicianSearchRequest.pageIndex = event.page;
    this.physicianSearchRequest.pageSize = event.rows;
    this.physicianBehavior$.next(this.physicianSearchRequest);
  }

  prepareAddPhysician(event: any) {
    const ref = this.dialogService.open(AouPhysicianComponent, {
      header: 'Thêm mới Bác sĩ',
      width: '50%',
      contentStyle: { 'overflow': 'auto'},
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Cập nhật Bác Sĩ');
    });
  }

  searchPhysician() {
    this.physicianSearchRequest.physicianName = this.keyword;
    this.physicianBehavior$.next(this.physicianSearchRequest);
  }

  changeStatus(selectedphysician: any) {
    // tslint:disable-next-line: no-shadowed-variable
    const ChangePhysicianStatuss = new ChangePhysicianStatus();
    ChangePhysicianStatuss.id = selectedphysician.id;
    ChangePhysicianStatuss.status = selectedphysician.status === 1 ? 2 : 1;
    this.configmationService.confirm({
      message: 'Bạn có chắc chắn muốn thay đổi trạng thái bác sĩ này?',
      accept: () => {
        this.physicianService.changeStatus(ChangePhysicianStatuss).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái bác sĩ');
        });
      }
    });
  }

  confirmDeleted(selectedphysician: any) {
    console.log(selectedphysician);
    this.configmationService.confirm({
      message: 'Bạn có chắc muốn xóa Bác Sĩ này? ',
      accept: () => {
        this.physicianService.changeStatus(selectedphysician.id).subscribe(response => {
          this.showMessage(response, 'Xóa Bác sĩ');
        });
      }
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.physicianBehavior$.next(this.physicianSearchRequest);
      } else {
        this.messageService.add({ severity: 'error ', summary: summary, detail: result.statusMessage });
      }
    }
  }



  // them() {
  //   this.newPhysician = true;
  //   this.physician = {};
  //   this.displayDialog = true;
  // }
  // save() {
  //   const physicians = [...this.physicians];
  //   console.log(this.physician);
  //   if (this.newPhysician) {
  //     physicians.push(this.physician);
  //   } else {
  //     physicians[this.physicians.indexOf(this.selectedphysician)] = this.physician;
  //   }

  //   this.physicians = physicians;
  //   this.physician = null;
  //   this.displayDialog = false;
  //   window.alert('Lưu Thành Công');

  // }
  // delete() {
  //   const index = this.physicians.indexOf(this.selectedphysician);
  //   console.log(index);
  //   this.physicians = this.physicians.filter((val, i) => i !== index);
  //   this.physician = null;
  //   this.displayDialog = false;
  // }
  // sua() {
  //   this.newPhysician = false;
  //   // this.physician = this.cloneCar(event.data);
  //   this.displayDialog = true;

  // }

  // onRowSelect(event) {
  //   this.newPhysician = false;
  //   this.physician = this.cloneCar(event.data);
  //   this.select = true;
  //   this.displayDialog = true;
  // }
  // xoa() {
  //   if (this.select) {
  //     const index = this.physicians.indexOf(this.selectedphysician);
  //     console.log(index);
  //     this.physicians = this.physicians.filter((val, i) => i !== index);
  //     this.physician = null;
  //     this.displayDialog = false;
  //     this.select = false;
  //   } else {
  //     window.alert('Vui Lòng Chọn Bác Sĩ');
  //   }

  // }
  // cloneCar(c: Physician): Physician {
  //   const physician = {};
  //   // tslint:disable-next-line:forin
  //   for (const prop in c) {
  //     physician[prop] = c[prop];
  //   }
  //   return physician;
  // }

}
