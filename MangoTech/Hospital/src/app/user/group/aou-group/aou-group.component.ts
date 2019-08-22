import { Component, OnInit } from '@angular/core';
import { GroupService } from '../group.service';
import { DynamicDialogRef, DynamicDialogConfig } from 'primeng/api';
import { GroupModel } from '../model/group.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';

@Component({
  selector: 'app-aou-group',
  templateUrl: './aou-group.component.html',
  styleUrls: ['./aou-group.component.css']
})
export class AouGroupComponent implements OnInit {

  group: GroupModel;
  statusLabel: string;
  status: boolean;
  mode: number;

  constructor(
    private groupService: GroupService,
    public ref: DynamicDialogRef,
    public config: DynamicDialogConfig
  ) { }

  ngOnInit() {
    if (!this.config.data) {
      this.group = new GroupModel();
      this.mode = 0;
    } else {
      this.group = {...this.config.data.group};
      this.mode = 1;
      this.status = this.group.status === 1 ? true : false;
    }
    console.log(this.group);
    // init status
    this.status = true;
    this.statusLabel = 'Đang hoạt động';
  }

  changeStatus() {
    this.statusLabel = this.status ? 'Đang hoạt động' : 'Ngừng hoạt động';
  }

  save() {
    this.group.status = this.status ? 1 : 2;
    if (this.mode === 0) {
      this.group.created = new Date().getTime();
      this.groupService.addGroup(this.group).subscribe(response => {
        if (response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.ref.close(response);
        }
      });
    }
    if (this.mode === 1) {
      this.groupService.updateGroup(this.group).subscribe(response => {
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
