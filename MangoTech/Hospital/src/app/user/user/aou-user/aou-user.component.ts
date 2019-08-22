import { Component, OnInit } from '@angular/core';
import { UserModel } from '../model/user.model';
import { UserService } from '../user.service';
import { GroupService } from '../../group/group.service';
import { GroupModel } from '../../group/model/group.model';
import { Gender } from '../model/gender.model';
import { DynamicDialogRef, DynamicDialogConfig, MessageService } from 'primeng/api';
import { RESPONSE } from 'src/app/shared/resources/response.resource';

@Component({
  selector: 'app-aou-user',
  templateUrl: './aou-user.component.html',
  styleUrls: ['./aou-user.component.css']
})
export class AouUserComponent implements OnInit {

  user: UserModel;
  groups: GroupModel[];
  selectedGroup: GroupModel;
  genders: Gender[];
  selectedGender: Gender;
  birthDate: Date;

  statusLabel: string;
  status: boolean;
  mode: number;
  confirmPassword: string;

  constructor(
    private userService: UserService,
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
      {
        id: 3,
        name: 'Khác'
      }
    ];
    // init user
    if (this.config.data) {
      this.user = { ...this.config.data.user };
      this.confirmPassword = this.user.password;
      this.mode = 1;
      this.genders.forEach(item => {
        if (item.id === this.user.gender) {
          this.selectedGender = item;
        }
      });
      this.birthDate = new Date(this.user.birthDate);
      this.status = this.user.status === 1;
    } else {
      this.user = new UserModel();
      this.mode = 0;
      this.status = true;
      this.selectedGender = this.genders[0];
    }
    this.changeStatus();
    console.log(this.user);
    // init groups
    this.groupService.getAllGroups().subscribe(response => {
      this.groups = response.data;
      this.groups.forEach(item => {
        if (item.id === this.user.groupId) {
          this.selectedGroup = item;
        }
      });
    });
  }

  changeStatus() {
    this.statusLabel = this.status ? 'Đang hoạt động' : 'Ngừng hoạt động';
  }

  save() {
    this.setUserInfo();
    if (this.mode === 0) {
      if (this.user.password === this.confirmPassword) {
        this.user.created = new Date().getTime();
        this.userService.addUser(this.user).subscribe(response => {
          this.ref.close(response);
        });
      } else {
        this.messageService.add({ severity: 'error', summary: 'Thêm mới người dùng', detail: 'Xác nhận mật khẩu không chính xác' });
      }

    }
    if (this.mode === 1) {
      if (this.user.password === this.confirmPassword) {
        this.userService.updateUser(this.user).subscribe(response => {
          this.ref.close(response);
        });
      } else {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'error', summary: 'Chỉnh sửa thông tin người dùng', detail: 'Xác nhận mật khẩu không chính xác' });
      }
    }
  }

  cancel() {
    this.ref.close();
  }

  setUserInfo() {
    this.user.fullName = this.user.surname + ' ' + this.user.lastName;
    this.user.groupId = this.selectedGroup.id;
    this.user.groupName = this.selectedGroup.groupName;
    this.user.status = this.status ? 1 : 2;
    this.user.gender = this.selectedGender.id;
    if (this.birthDate) {
      this.user.birthDate = this.birthDate.getTime();
    }
  }
}
