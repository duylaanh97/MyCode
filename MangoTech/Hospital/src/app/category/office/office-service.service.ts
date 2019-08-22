import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { Observable } from 'rxjs';
import { OfficeModel } from './model/office.model';
import { OfficeSearchRequest } from './dto/office-search.model';
import { OFFICE_API_PATH } from './resources/office.resource';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class OfficeServiceService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listOffice(officeSearchRequest: OfficeSearchRequest): Observable<any> {
    return this.apiService.post(OFFICE_API_PATH.listOffices, officeSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
