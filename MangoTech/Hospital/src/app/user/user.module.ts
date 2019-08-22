import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserRoutingModule } from './user-routing.module';
import { GroupComponent } from './group/group.component';
import { UserComponent } from './user/user.component';
import { PermissionComponent } from './permission/permission.component';
import { PhysicianComponent } from './physician/physician.component';
import { TableModule } from 'primeng/table';
import { MessageService } from 'primeng/api';
import { DialogModule } from 'primeng/components/dialog/dialog';
import { ConfirmDialogModule } from 'primeng/components/confirmdialog/confirmdialog';
import { DropdownModule } from 'primeng/components/dropdown/dropdown';
import { MenubarModule } from 'primeng/components/menubar/menubar';
import {ButtonModule} from 'primeng/button';
import {SplitButtonModule} from 'primeng/splitbutton';

import { FormsModule } from '@angular/forms';
import { InputTextModule, PaginatorModule, DialogService, InputTextareaModule, PasswordModule, PanelModule } from 'primeng/primeng';
import { CheckboxModule, ConfirmationService, CalendarModule, FieldsetModule } from 'primeng/primeng';
import { AouGroupComponent } from './group/aou-group/aou-group.component';
import { DynamicDialogModule } from 'primeng/components/dynamicdialog/dynamicdialog';
import {ToastModule} from 'primeng/toast';
import { AouPhysicianComponent } from './physician/aou-physician/aou-physician.component';
import { AouUserComponent } from './user/aou-user/aou-user.component';
@NgModule({
  declarations: [
    GroupComponent, UserComponent, PermissionComponent, PhysicianComponent,
    AouGroupComponent, AouPhysicianComponent, AouUserComponent
  ],
  imports: [
    CommonModule,
    UserRoutingModule,
    TableModule,
    DialogModule,
    ConfirmDialogModule,
    DynamicDialogModule,
    DropdownModule,
    MenubarModule,
    ButtonModule,
    SplitButtonModule,
    FormsModule,
    InputTextModule,
    InputTextareaModule,
    PaginatorModule,
    CheckboxModule,
    ToastModule,
    CalendarModule,
    PasswordModule,
    PanelModule,
    FieldsetModule
  ],
  providers: [MessageService, DialogService, ConfirmationService],
  entryComponents: [
    AouGroupComponent,
    AouUserComponent,
    AouPhysicianComponent
]
})
export class UserModule { }
