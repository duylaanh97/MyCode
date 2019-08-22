import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { PaymentSearchRequest } from './dto/payment-search.model';
import { Observable } from 'rxjs';
import { PAYMENT_API_PATH } from './resources/payment.resource';
import { map } from 'rxjs/operators';
import { HttpParams } from '@angular/common/http';
import { Payment } from './model/payment.model';
import { ChangePaymentStatus } from './dto/payment-change-status.model';

@Injectable({
  providedIn: 'root'
})
export class PaymentService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listPayment( paymentSearchRequest: PaymentSearchRequest): Observable<any> {
    return this.apiService.post(PAYMENT_API_PATH.listPayment, paymentSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addPayment( paymentAddRequest: Payment): Observable<any> {
    return this.apiService.post(PAYMENT_API_PATH.addPayment, paymentAddRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updatePayment( paymentUpdateRequest: Payment): Observable<any> {
    return this.apiService.post(PAYMENT_API_PATH.updatePayment, paymentUpdateRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deletePayment(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(PAYMENT_API_PATH.daletePayment, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus( changePaymentStatus: ChangePaymentStatus): Observable<any> {
    return this.apiService.post(PAYMENT_API_PATH.changeStatus, changePaymentStatus ).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
