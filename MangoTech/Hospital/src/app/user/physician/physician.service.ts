import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { PhysicianSearchRequest } from './dto/physician-search.model';
import { Observable } from 'rxjs';
import { PHYSICIAN_API_PATH } from './resources/physician.resource';
import { map } from 'rxjs/operators';
import { HttpParams } from '@angular/common/http';
import { Physician } from './model/physician.model';
import { ChangePhysicianStatus } from './dto/physician-change-status.model';

@Injectable({
  providedIn: 'root'
})
export class PhysicianService {

  constructor(
    private apiService: BaseApiService
    ) { }

  listPhysician( physicianSearchRequest: PhysicianSearchRequest): Observable<any> {
    return this.apiService.post(PHYSICIAN_API_PATH.listPhysician, physicianSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addPhysician(physicianAddRequest: Physician): Observable<any> {
    return this.apiService.post(PHYSICIAN_API_PATH.addPhysician, physicianAddRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updatePhysician(physicianUpdateRequest: Physician): Observable<any> {
    return this.apiService.post(PHYSICIAN_API_PATH.updatePhysicia, physicianUpdateRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deletePhysician(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(PHYSICIAN_API_PATH.deletePhysicia, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus( changePhysicianStatus: ChangePhysicianStatus): Observable<any> {
    return this.apiService.post(PHYSICIAN_API_PATH.changeStatus, changePhysicianStatus ).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  // getphysician() {
  //   return this.http.get<any>('')
  //     .toPromise()
  //     .then(res => <Physician[]>res.data)
  //     .then(data => data);

  // }

  // addphysician() {

  // }
}
