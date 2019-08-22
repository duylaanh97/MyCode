import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CustomersComponent } from './customers/customers.component';
import { MedicalComponent } from './medical/medical.component';

const routes: Routes = [
  { path: 'customers', component: CustomersComponent },
  { path: 'medical', component: MedicalComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class TreatmentRoutingModule { }
