import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { BaseApiService } from '../../shared/services/base-api.service';
import { CUSTOMER_API_PATH } from './resources/customer-resources';
import { CustomerModel } from './model/customer.model';
import { CustomerSearchRequest } from './dto/customer-search.model';
import { HttpParams } from '@angular/common/http';
import { CustomerChangeStatus } from './dto/customer-changeStatus.model';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listCustomers(customerSearchRequest: CustomerSearchRequest): Observable<any> {
    return this.apiService.post(
      CUSTOMER_API_PATH.list,
      customerSearchRequest
    ).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addCustomer(customer: CustomerModel): Observable<any> {
    console.log(customer);
    return this.apiService.post(
      CUSTOMER_API_PATH.add,
      customer
    ).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updateCustomer(customer: CustomerModel): Observable<any> {
    return this.apiService.post(
      CUSTOMER_API_PATH.update,
      customer
    ).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  getCustomer(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(CUSTOMER_API_PATH.get, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus(changeCustomerStatus: CustomerChangeStatus): Observable<any> {
    return this.apiService.post(CUSTOMER_API_PATH.changeStatus, changeCustomerStatus).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deleteCustomer(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(CUSTOMER_API_PATH.delete, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

}
