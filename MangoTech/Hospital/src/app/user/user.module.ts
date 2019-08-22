import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserRoutingModule } from './user-routing.module';
import { GroupComponent } from './group/group.component';
import { UserComponent } from './user/user.component';
import { PermissionComponent } from './permission/permission.component';

@NgModule({
  declarations: [GroupComponent, UserComponent, PermissionComponent],
  imports: [
    CommonModule,
    UserRoutingModule
  ]
})
export class UserModule { }
