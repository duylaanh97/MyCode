import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ClinicServiceComponent } from './clinic-service/clinic-service.component';
import { OfficeComponent } from './office/office.component';
import { SpecialityComponent } from './speciality/speciality.component';

const routes: Routes = [
  {
    path: 'office', component: OfficeComponent
  },
  {
    path: 'speciality', component: SpecialityComponent
  },
  {
    path: 'service', component: ClinicServiceComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CategoryRoutingModule { }
