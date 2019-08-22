export class PhysicianSearchRequest {
  physicianName: string;
  pageIndex: number;
  pageSize: number;

  constructor() {
    this.physicianName = '';
    this.pageIndex = 0;
    this.pageSize = 10;
  }
}
