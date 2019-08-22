import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Payment } from 'src/app/payment/payment/model/payment.model';


@Injectable()
export class PayService {

    constructor(private http: HttpClient) {}

    getpayment() {
        return this.http.get<any>('assets/demo/data/payment.json')
                    .toPromise()
                    .then(res => <Payment[]> res.data)
                    .then(data => data);
    }
}
