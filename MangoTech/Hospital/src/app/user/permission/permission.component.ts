import { Component, OnInit } from '@angular/core';
import { GroupModel } from '../group/model/group.model';
import { RoleModel } from './model/role.model';
import { GroupService } from '../group/group.service';
import { PermissionService } from './permission.service';
import { ROLE_MODULES } from './resources/role-module.resource';
import { ROLE_FUNCTIONS } from './resources/role-function.resource';
import { PermissionRequest } from './dto/permission-request.model';
import { RESPONSE } from 'src/app/shared/resources/response.resource';
import { MessageService } from 'primeng/api';
import { ActivatedRoute } from '@angular/router';
import { BehaviorSubject } from 'rxjs';

@Component({
  selector: 'app-permission',
  templateUrl: './permission.component.html',
  styleUrls: ['./permission.component.css']
})
export class PermissionComponent implements OnInit {

  // Group
  groups: GroupModel[];
  group: GroupModel;
  groupId: string;

  // Roles
  selectedRoles: string[] = [];
  roles: RoleModel[];
  roleBehavior$: BehaviorSubject<GroupModel> = new BehaviorSubject<GroupModel>({} as GroupModel);

  // permission
  permissionRequest: PermissionRequest;
  roleModules = ROLE_MODULES;
  roleFunctions = ROLE_FUNCTIONS;
  selectedModules: string[];

  constructor(
    private groupService: GroupService,
    private permissionService: PermissionService,
    private messageService: MessageService,
    private route: ActivatedRoute
  ) { }

  ngOnInit() {
    // load groups
    this.groupService.getAllGroups().subscribe(response => {
      if (response.data) {
        this.groups = response.data;
      } else {
        this.groups = [];
      }
    });

    // load roles
    this.permissionService.listRoles().subscribe(response => {
      if (response.data) {
        this.roles = response.data;
      } else {
        this.roles = [];
      }
    });

    // load group by param
    this.route.params.subscribe(params => {
      this.groupId = params['groupId'];
      if (this.groupId) {
        this.groupService.getGroup(this.groupId).subscribe(response => {
          if (response.data) {
            this.group = response.data;
          }
        });
        this.roleBehavior$.asObservable().subscribe(group => {
          this.permissionService.listRolesByGroup(this.group.id).subscribe(response => {

          });
        });
      }
    });
  }

  changeGroup() {
    
  }

  changeCheckAll(roleModule: any) {
    let checked = false;
    const roleIds: string[] = [...this.selectedRoles];
    if (this.selectedModules && this.selectedModules.length > 0) {
      for (const item of this.selectedModules) {
        if (item === roleModule) {
          checked = true;
          break;
        }
      }
    }
    if (checked) {
      this.roles.forEach(role => {
        if (role.roleModule === roleModule) {
          let add = true;
          roleIds.forEach(id => {
            if (id === role.id + '') {
              add = false;
            }
          });
          if (add) {
            roleIds.push(role.id + '');
          }
        }
      });
    } else {
      this.roles.forEach(role => {
        if (role.roleModule === roleModule) {
          const index = roleIds.indexOf(role.id + '');
          if (index !== -1) {
            roleIds.splice(index, 1);
          }
        }
      });
    }
    this.selectedRoles = roleIds;
    console.log(this.selectedRoles);
  }

  changeCheck(role: any) {
    console.log(role);
    // verify checked
    let checked = false;
    for (const id of this.selectedRoles) {
      if (id === role.id + '') {
        checked = true;
        break;
      }
    }
    const roleModules = [...this.selectedModules];
    // if unchecked
    if (!checked) {
      const index = roleModules.indexOf(role.roleModule);
      if (index !== -1) {
        roleModules.splice(index, 1);
      }
      // if checked
    } else {
      let checkedAll = true;
      this.roles.forEach(item => {
        if (this.selectedRoles.indexOf(item.id + '') === -1 && item.roleModule === role.roleModule) {
          checkedAll = false;
        }
      });

      if (checkedAll) {
        roleModules.push(role.roleModule);
      }
    }
    this.selectedModules = roleModules;
    console.log(this.selectedModules);
  }

  doPermission() {
    // make request
    this.permissionRequest = new PermissionRequest();
    this.permissionRequest.groupId = this.group.id;
    this.permissionRequest.roleIds = this.selectedRoles.toString();
    this.permissionService.doPermission(this.permissionRequest).subscribe(response => {
      console.log(response);
      this.showMessage(response, 'Phân quyền người dùng');
    });
  }

  private showMessage(result: any, summary: string) {
    if (result) {
      if (result.statusCode === RESPONSE.requestSuccess.statusCode) {
        // tslint:disable-next-line: max-line-length
        this.messageService.add({ severity: 'success', summary: summary, detail: RESPONSE.requestSuccess.statusMessage });
      } else {
        this.messageService.add({ severity: 'error', summary: summary, detail: result.statusMessage });
      }
    }
  }

}
