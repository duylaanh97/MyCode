import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { OfficeSearchRequest } from './dto/office-search.model';
import { Observable } from 'rxjs';
import { OFFICE_API_PATH } from './resources/office.resource';
import { map } from 'rxjs/operators';
import { OfficeModel } from './model/office.model';
import { HttpParams } from '@angular/common/http';
import { ChangeOfficeStatus } from './dto/office-change-status.model';


@Injectable({
  providedIn: 'root'
})
export class OfficeService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listOffice( officeSearchRequest: OfficeSearchRequest): Observable<any> {
    return this.apiService.post(OFFICE_API_PATH.listOffices, officeSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addOffice( officeAddRequest: OfficeModel): Observable<any> {
    return this.apiService.post(OFFICE_API_PATH.addOffice, officeAddRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updateOffice( officeUpdateRequest: OfficeModel): Observable<any> {
    return this.apiService.post(OFFICE_API_PATH.updateOffice, officeUpdateRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deleteOffice(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(OFFICE_API_PATH.deleteOffice, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus( changeOfficeStatus: ChangeOfficeStatus): Observable<any> {
    return this.apiService.post(OFFICE_API_PATH.changeStatus, changeOfficeStatus).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  getAllOffices(): Observable<any> {
    return this.apiService.get(OFFICE_API_PATH.getAllOffice).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  getOffice(officeId: string): Observable<any> {
    const params = new HttpParams().append('id', officeId);
    return this.apiService.get(OFFICE_API_PATH.getOffice, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
