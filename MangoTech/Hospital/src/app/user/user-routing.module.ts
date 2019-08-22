import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UserComponent } from './user/user.component';
import { PermissionComponent } from './permission/permission.component';
import { PhysicianComponent } from './physician/physician.component';
import { GroupComponent } from './group/group.component';

const routes: Routes = [
  {
    path: 'group', component: GroupComponent
  },
  {
    path: 'list-users', component: UserComponent
  },
  {
    path: 'permission/:groupId', component: PermissionComponent
  },
  {
    path: 'permission', component: PermissionComponent
  },
  {
    path: 'physician', component: PhysicianComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule { }
