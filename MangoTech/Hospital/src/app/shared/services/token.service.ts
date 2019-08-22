import { Injectable } from '@angular/core';
import * as store from 'store';

@Injectable()
export class TokenService {
  getToken(): string {
    return store.get('token');
  }

  saveToken(token: string) {
    if (this.getToken()) {
      this.destroyToken();
    }
    store.set('token', token);
  }

  destroyToken() {
    store.remove('token');
  }

//   getCurrentUser(): CustomerModel {
//     return store.get('currentUser') as CustomerModel;
//   }

//   saveCurrentUser(user: CustomerModel) {
//     if (this.getCurrentUser()) {
//       this.removeCurrentUser();
//     }
//     store.set('currentUser', user);
//   }

//   removeCurrentUser() {
//     store.remove('currentUser');
//   }
}
