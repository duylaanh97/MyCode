import { Component, OnInit } from '@angular/core';
import { UserModel } from '../../shared/models/user';
import { UserSearchRequest } from './dto/user-search-request.model';
import { PAGE_CONFIG } from '../../shared/resources/config.resource';
import { BehaviorSubject } from 'rxjs';
import { UserService } from './user.service';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { RESPONSE } from '../../shared/resources/response.resource';
import { AouUserComponent } from './aou-user/aou-user.component';
import { UserChangeStatus } from './dto/user-change-status.model';
import { UserChangePassRequest } from './dto/user-change-pass.model';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

  // Search list
  userSearchRequest: UserSearchRequest;
  cols: any[];
  users: UserModel;
  totalRecords = PAGE_CONFIG.totalRecords;
  pageSize = PAGE_CONFIG.defaultPageSize;
  keyword = '';
  userBehavior$: BehaviorSubject<UserSearchRequest> = new BehaviorSubject<UserSearchRequest>({} as UserSearchRequest);

  // dialog for add, edit
  dialogTitle: string;

  // dialog change password
  showDialogChangePassword = false;
  userChangePassRequest: UserChangePassRequest = new UserChangePassRequest();
  confirmPassword: string;

  constructor(
    private userService: UserService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private confirmationService: ConfirmationService
  ) { }

  ngOnInit() {
    this.cols = [
      { field: 'username', header: 'Tài khoản' },
      { field: 'fullName', header: 'Họ Tên' },
      { field: 'phone', header: 'Số điện thoại' },
      { field: 'email', header: 'Email' },
      { field: 'groupName', header: 'Nhóm người dùng' },
      { field: 'creator', header: 'Người tạo' }
    ];

    // get list users from api
    this.userSearchRequest = new UserSearchRequest();
    this.userBehavior$.asObservable().subscribe((userSearchRequest: UserSearchRequest) => {
      return this.userService.listUsers(this.userSearchRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.users = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.users = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.userSearchRequest.pageIndex = event.page;
    this.userSearchRequest.pageSize = event.rows;
    this.userBehavior$.next(this.userSearchRequest);
  }

  prepareAddUser(event: any) {
    const ref = this.dialogService.open(AouUserComponent, {
      header: 'Thêm mới nhóm người dùng',
      width: '60%',
      contentStyle: { 'overflow': 'scroll', 'min-height': '500px' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Thêm mới người dùng');
    });
  }

  selectUser(selectedUser: any) {
    const ref = this.dialogService.open(AouUserComponent, {
      data: {
        user: selectedUser
      },
      header: 'Chỉnh sửa thông tin người dùng',
      width: '60%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      console.log(result);
      this.showMessage(result, 'Cập nhật thông tin người dùng');
    });
  }

  searchUsers() {
    this.userSearchRequest.username = this.keyword;
    this.userSearchRequest.fullName = this.keyword;
    this.userSearchRequest.phone = this.keyword;
    this.userBehavior$.next(this.userSearchRequest);
  }

  changeStatus(selectedUser: any) {
    const userChangeStatus = new UserChangeStatus();
    userChangeStatus.id = selectedUser.id;
    userChangeStatus.status = selectedUser.status === 1 ? 2 : 1;
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn thay đổi trạng thái người dùng này?',
      accept: () => {
        this.userService.changeStatus(userChangeStatus).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái người dùng');
        });
      }
    });
  }

  confirmDeleted(selectedUser: any) {
    console.log(selectedUser);
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn xóa người dùng này?',
      accept: () => {
        this.userService.deleteUser(selectedUser.id).subscribe(response => {
          this.showMessage(response, 'Xóa người dùng');
        });
      }
    });
  }

  changePassword(selectedUser: any) {
    this.userChangePassRequest = {...selectedUser};
    this.showDialogChangePassword = true;
  }

  saveChangePass() {
    console.log(this.userChangePassRequest);
    if (this.userChangePassRequest.password !== this.confirmPassword) {
      this.messageService.add({ severity: 'error', summary: 'Thay đổi mật khẩu', detail: 'Xác nhận mật khẩu không chính xác' });
      return;
    }
    this.userService.changePassword(this.userChangePassRequest).subscribe(response => {
      this.showMessage(response, 'Thay đổi mật khẩu');
      this.showDialogChangePassword = false;
    });
  }

  cancelChangePass() {
    this.userChangePassRequest.id = null;
    this.userChangePassRequest.password = null;
    this.showDialogChangePassword = false;
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.userBehavior$.next(this.userSearchRequest);
      } else {
        this.messageService.add({ severity: 'error', summary: summary, detail: result.statusMessage });
      }
    }
  }

}
