import { Component, OnInit } from '@angular/core';
import { PhysicianService } from '../physician.service';
import { DynamicDialogRef, DynamicDialogConfig, MessageService } from 'primeng/api';
import { Physician } from '../model/physician.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { Gender } from '../model/gender.model';
import { GroupService } from '../../group/group.service';
import { GroupModel } from '../../group/model/group.model';

@Component({
  selector: 'app-aou-physician',
  templateUrl: './aou-physician.component.html',
  styleUrls: ['./aou-physician.component.css']
})
export class AouPhysicianComponent implements OnInit {

  physician: Physician;
  statusLabel: string;
  status: boolean;
  mode: number;
  selectedGroup: GroupModel;
  genders: Gender[];
  selectedGender: Gender;

  constructor(
    private physicianService: PhysicianService,
    private groupService: GroupService,
    public ref: DynamicDialogRef,
    public config: DynamicDialogConfig,
    private messageService: MessageService
  ) { }

  ngOnInit() {
    // init genders
    this.genders = [
      {
        id: 1,
        name: 'Nam'
      },
      {
        id: 2,
        name: 'Nữ'
      },
    ];
    // init physician
    if (!this.config.data) {
      this.physician = new Physician();
      this.mode = 0;
    } else {
      this.physician = {...this.config.data.group};
      this.mode = 1;
      this.status = this.physician.description === 1 ? true : false;
    }
    console.log(this.physician);
    // init status
    this.status = true;
    this.statusLabel = 'Đang hoạt động';
  }

  save() {
    this.physician.description = this.status ? 1 : 2;
    if (this.mode === 0) {
      this.physician.created = new Date().getTime();
      this.physicianService.addPhysician(this.physician).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
    if (this.mode === 1) {
      this.physicianService.updatePhysician(this.physician).subscribe(response => {
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
