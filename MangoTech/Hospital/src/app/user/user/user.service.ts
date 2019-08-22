import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { UserSearchRequest } from './dto/user-search-request.model';
import { Observable } from 'rxjs';
import { USER_API_PATH } from './resources/user.resource';
import { map } from 'rxjs/operators';
import { UserModel } from './model/user.model';
import { HttpParams } from '@angular/common/http';
import { UserChangeStatus } from './dto/user-change-status.model';
import { UserChangePassRequest } from './dto/user-change-pass.model';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listUsers(userSearchRequest: UserSearchRequest): Observable<any> {
    return this.apiService.post(USER_API_PATH.listUsers, userSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addUser(userAddRequest: UserModel): Observable<any> {
    return this.apiService.post(USER_API_PATH.addUser, userAddRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updateUser(userUpdateRequest: UserModel): Observable<any> {
    return this.apiService.post(USER_API_PATH.updateUser, userUpdateRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deleteUser(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(USER_API_PATH.deleteUser, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus(userChangeStatus: UserChangeStatus): Observable<any> {
    return this.apiService.post(USER_API_PATH.changeStatus, userChangeStatus).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changePassword(userChangePassword: UserChangePassRequest): Observable<any> {
    return this.apiService.post(USER_API_PATH.changePassword, userChangePassword).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
