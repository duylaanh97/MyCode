export class PaymentSearchRequest {
  username: string;
  pageIndex: number;
  pageSize: number;

  constructor() {
    this.username = '';
    this.pageIndex = 0;
    this.pageSize = 10;
  }
}
