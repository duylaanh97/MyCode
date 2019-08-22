import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CategoryRoutingModule } from './category-routing.module';
import { ClinicServiceComponent } from './clinic-service/clinic-service.component';

@NgModule({
  declarations: [ClinicServiceComponent],
  imports: [
    CommonModule,
    CategoryRoutingModule
  ]
})
export class CategoryModule { }
