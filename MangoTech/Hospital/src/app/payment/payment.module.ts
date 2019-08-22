import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PaymentRoutingModule } from './payment-routing.module';
import { PaymentComponent } from './payment/payment.component';
import { UserComponent } from '../user/user/user.component';
import { MessageService } from 'primeng/api';
import { TableModule } from 'primeng/table';
import { DialogModule } from 'primeng/components/dialog/dialog';
import { ConfirmDialogModule } from 'primeng/components/confirmdialog/confirmdialog';
import { DropdownModule } from 'primeng/components/dropdown/dropdown';
import { MenubarModule } from 'primeng/components/menubar/menubar';
import {ButtonModule} from 'primeng/button';
import {SplitButtonModule} from 'primeng/splitbutton';

import { FormsModule } from '@angular/forms';
import { InputTextModule, PaginatorModule, DialogService, InputTextareaModule, PasswordModule, PanelModule } from 'primeng/primeng';
import { CheckboxModule, ConfirmationService, CalendarModule, FieldsetModule } from 'primeng/primeng';
import { AouPaymentComponent } from './payment/aou-payment/aou-payment.component';
import { DynamicDialogModule } from 'primeng/components/dynamicdialog/dynamicdialog';
import {ToastModule} from 'primeng/toast';
import { HistoryPaymentsComponent } from './payment/history-payments/history-payments.component';
@NgModule({
  declarations: [PaymentComponent , AouPaymentComponent, HistoryPaymentsComponent , UserComponent],
  imports: [
    CommonModule,
    PaymentRoutingModule,
    TableModule,
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
    DynamicDialogModule,
    ToastModule,
    CalendarModule
  ],
  providers: [MessageService , DialogService , ConfirmationService],
  entryComponents: [
    AouPaymentComponent,
    HistoryPaymentsComponent
  ]
})
export class PaymentModule { }
