import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { GroupSearchRequest } from './dto/group-search.model';
import { Observable } from 'rxjs';
import { GROUP_API_PATH } from './resources/group.resource';
import { map } from 'rxjs/operators';
import { GroupModel } from './model/group.model';
import { HttpParams } from '@angular/common/http';
import { ChangeGroupStatus } from './dto/group-change-status.model';

@Injectable({
  providedIn: 'root'
})
export class GroupService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listGroup(groupSearchRequest: GroupSearchRequest): Observable<any> {
    return this.apiService.post(GROUP_API_PATH.listGroups, groupSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  addGroup(groupAddRequest: GroupModel): Observable<any> {
    return this.apiService.post(GROUP_API_PATH.addGroup, groupAddRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  updateGroup(groupUpdateRequest: GroupModel): Observable<any> {
    return this.apiService.post(GROUP_API_PATH.updateGroup, groupUpdateRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  deleteGroup(id: string): Observable<any> {
    const params = new HttpParams().append('id', id);
    return this.apiService.get(GROUP_API_PATH.deleteGroup, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  changeStatus(changeGroupStatus: ChangeGroupStatus): Observable<any> {
    return this.apiService.post(GROUP_API_PATH.changeStatus, changeGroupStatus).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  getAllGroups(): Observable<any> {
    return this.apiService.get(GROUP_API_PATH.getAllGroups).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  getGroup(groupId: string): Observable<any> {
    const params = new HttpParams().append('id', groupId);
    return this.apiService.get(GROUP_API_PATH.getGroup, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

}
