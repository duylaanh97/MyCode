import { NgModule } from '@angular/core';
import { AccordionModule } from 'primeng/accordion';
import { TableModule } from 'primeng/table';
import { ButtonModule, PanelModule, PaginatorModule } from 'primeng/primeng';
import { DialogModule } from 'primeng/components/dialog/dialog';
import { ConfirmDialogModule } from 'primeng/components/confirmdialog/confirmdialog';
import { DropdownModule } from 'primeng/components/dropdown/dropdown';
import { MenubarModule } from 'primeng/components/menubar/menubar';
import { CalendarModule } from 'primeng/calendar';
import { InputTextModule } from 'primeng/components/inputtext/inputtext';
import { InputTextareaModule } from 'primeng/inputtextarea';
import { SliderModule } from 'primeng/slider';
import { MultiSelectModule } from 'primeng/multiselect';
import { DynamicDialogModule } from 'primeng/components/dynamicdialog/dynamicdialog';
import { ToastModule } from 'primeng/toast';

@NgModule({
  exports: [
    AccordionModule,
    TableModule,
    ButtonModule,
    PanelModule,
    DialogModule,
    ConfirmDialogModule,
    DropdownModule,
    MenubarModule,
    SliderModule,
    MultiSelectModule,
    CalendarModule,
    InputTextModule,
    InputTextareaModule,
    PaginatorModule,
    DynamicDialogModule,
    ToastModule
  ]
})

export class PrimeNGModule { }
