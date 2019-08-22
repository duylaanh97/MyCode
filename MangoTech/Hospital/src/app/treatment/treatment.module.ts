import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TreatmentRoutingModule } from './treatment-routing.module';
import { CustomersComponent } from './customers/customers.component';

// Quick Import
import { AngularModules } from '../treatment/imports/angular-modules';
import { PrimeNGModule } from '../treatment/imports/primeng-modules';
import { MedicalComponent } from './medical/medical.component';
import { CustomerDialogComponent } from './customers/customer-dialog/customer-dialog.component';
import { MessageService, DialogService, ConfirmationService } from 'primeng/api';

@NgModule({
  declarations: [
    CustomersComponent,
    MedicalComponent,
    CustomerDialogComponent
  ],
  imports: [
    CommonModule,
    TreatmentRoutingModule,
    AngularModules,
    PrimeNGModule
  ],
  providers: [MessageService, DialogService, ConfirmationService],
  entryComponents: [CustomerDialogComponent]
})
export class TreatmentModule { }
