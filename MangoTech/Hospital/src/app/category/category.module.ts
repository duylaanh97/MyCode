import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CategoryRoutingModule } from './category-routing.module';
import { OfficeComponent } from './office/office.component';
import { SpecialityComponent } from './speciality/speciality.component';
import { ClinicServiceComponent } from './clinic-service/clinic-service.component';
import { AouOfficeComponent } from './office/aou-office/aou-office.component';
import { TableModule } from 'primeng/table';
import { MessageService } from 'primeng/api';
import { DialogModule } from 'primeng/components/dialog/dialog';
import { ConfirmDialogModule } from 'primeng/components/confirmdialog/confirmdialog';
import { DropdownModule } from 'primeng/components/dropdown/dropdown';
import { MenubarModule } from 'primeng/components/menubar/menubar';
import { ButtonModule } from 'primeng/button';
import { SplitButtonModule } from 'primeng/splitbutton';

import { FormsModule } from '@angular/forms';
import { InputTextModule, PaginatorModule, DialogService, InputTextareaModule, PasswordModule, PanelModule } from 'primeng/primeng';
import { CheckboxModule, ConfirmationService, CalendarModule, FieldsetModule } from 'primeng/primeng';
import { DynamicDialogModule } from 'primeng/components/dynamicdialog/dynamicdialog';
import { ToastModule } from 'primeng/toast';


@NgModule({
  declarations: [OfficeComponent, SpecialityComponent, ClinicServiceComponent, AouOfficeComponent, ],
  imports: [
    CommonModule,
    CategoryRoutingModule,
    TableModule,
    DialogModule,
    ConfirmDialogModule,
    DropdownModule,
    MenubarModule,
    ButtonModule,
    SplitButtonModule,
    FormsModule,
    InputTextModule,
    PaginatorModule,
    InputTextareaModule,
    PasswordModule,
    PanelModule,
    CheckboxModule,
    CalendarModule,
    FieldsetModule,
    DynamicDialogModule,
    ToastModule
  ],
  providers: [ MessageService, DialogService, ConfirmationService,  ],
  entryComponents: [
    AouOfficeComponent
  ]
})
export class CategoryModule { }
