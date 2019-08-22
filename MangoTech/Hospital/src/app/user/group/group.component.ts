import { Component, OnInit } from '@angular/core';
import { GroupModel } from './model/group.model';
import { GroupSearchRequest } from './dto/group-search.model';
import { GroupService } from './group.service';
import { RESPONSE } from '../../shared/resources/response.resource';
import { BehaviorSubject } from 'rxjs';
import { DialogService, MessageService, ConfirmationService } from 'primeng/api';
import { AouGroupComponent } from './aou-group/aou-group.component';
import { ChangeGroupStatus } from './dto/group-change-status.model';
import { PAGE_CONFIG } from '../../shared/resources/config.resource';

@Component({
  selector: 'app-group',
  templateUrl: './group.component.html',
  styleUrls: ['./group.component.css']
})
export class GroupComponent implements OnInit {

  groupSearhRequest: GroupSearchRequest;
  groupBehavior$: BehaviorSubject<GroupSearchRequest> = new BehaviorSubject<GroupSearchRequest>({} as GroupSearchRequest);

  cols: any[];
  groups: GroupModel[];
  totalRecords = PAGE_CONFIG.totalRecords;
  pageSize = PAGE_CONFIG.defaultPageSize;
  keyword = '';

  // add and edit
  dialogTitle: string;

  constructor(
    private groupService: GroupService,
    private dialogService: DialogService,
    private messageService: MessageService,
    private confirmationService: ConfirmationService
  ) { }

  ngOnInit() {
    // make colums
    this.cols = [
      { field: 'groupName', header: 'Nhóm người dùng' },
      { field: 'description', header: 'Mô tả' },
      { field: 'creator', header: 'Người tạo' }
    ];

    // get list group from api
    this.groupSearhRequest = new GroupSearchRequest();
    this.groupBehavior$.asObservable().subscribe((groupSearhRequest: GroupSearchRequest) => {
      return this.groupService.listGroup(this.groupSearhRequest).subscribe(response => {
        if (response && response.statusCode === RESPONSE.requestSuccess.statusCode) {
          this.groups = response.data;
          this.totalRecords = response.totalRecords;
        } else {
          this.groups = [];
        }
      });
    });
  }

  paginate(event: any) {
    this.groupSearhRequest.pageIndex = event.page;
    this.groupSearhRequest.pageSize = event.rows;
    this.groupBehavior$.next(this.groupSearhRequest);
  }

  prepareAddGroup(event: any) {
    const ref = this.dialogService.open(AouGroupComponent, {
      header: 'Thêm mới nhóm người dùng',
      width: '50%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      this.showMessage(result, 'Thêm mới nhóm người dùng');
    });
  }

  selectGroup(selectedGroup: any) {
    const ref = this.dialogService.open(AouGroupComponent, {
      data: {
        group: selectedGroup
      },
      header: 'Chỉnh sửa nhóm người dùng',
      width: '50%',
      contentStyle: { 'overflow': 'auto' },
      closeOnEscape: true
    });

    ref.onClose.subscribe((result: any) => {
      console.log(result);
      this.showMessage(result, 'Cập nhật nhóm người dùng');
    });
  }

  searchGroups() {
    this.groupSearhRequest.groupName = this.keyword;
    this.groupBehavior$.next(this.groupSearhRequest);
  }

  changeStatus(selectedGroup: any) {
    const changeGroupStatus = new ChangeGroupStatus();
    changeGroupStatus.id = selectedGroup.id;
    changeGroupStatus.status = selectedGroup.status === 1 ? 2 : 1;
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn thay đổi trạng thái nhóm người dùng này?',
      accept: () => {
        this.groupService.changeStatus(changeGroupStatus).subscribe(response => {
          this.showMessage(response, 'Thay đổi trạng thái nhóm người dùng');
        });
      }
    });
  }

  confirmDeleted(selectedGroup: any) {
    console.log(selectedGroup);
    this.confirmationService.confirm({
      message: 'Bạn có chắc chắn muốn xóa nhóm người dùng này?',
      accept: () => {
        this.groupService.deleteGroup(selectedGroup.id).subscribe(response => {
          this.showMessage(response, 'Xóa nhóm người dùng');
        });
      }
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
        this.groupBehavior$.next(this.groupSearhRequest);
      } else {
        this.messageService.add({ severity: 'error', summary: summary, detail: result.statusMessage });
      }
    }
  }

}
