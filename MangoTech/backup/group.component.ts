import { Component, OnInit } from '@angular/core';
import { Group } from './model/group.model';
import { MessageService } from 'primeng/primeng';
import { CarService } from 'src/app/demo/service/carservice';

interface Gender {
  label: string;
  value: string;
}

@Component({
  selector: 'app-group',
  templateUrl: './group.component.html',
  styleUrls: ['./group.component.css'],
  providers: [CarService]
})
export class GroupComponent implements OnInit {

  group: Group = {};

  groups: Group[];

  cols: any[];

  displayDialog: boolean;

  newGroup: boolean;

  selectedgroup: Group;

  select = false;

  genders: Gender[];

  selectGender: Gender;

  constructor(private groupService: CarService, private messageService: MessageService) { }

  ngOnInit() {
    this.groupService.getgroup().then(groups => {
      console.log(groups);
      this.groups = groups;
    });

    this.genders = [
      {label: 'Nam', value: 'NM'},
      {label: 'Nữ', value: 'NN'}
    ];

    this.cols = [
      { field: 'stt',  header: 'STT' },
      { field: 'hoTen', header: 'Họ Tên' },
      { field: 'chuyenMon', header: 'Chuyên Môn' },
      { field: 'luong', header: 'Tiền Lương (VNĐ)' },
      { field: 'gioiTinh', header: 'Giới Tính' },
      { field: 'diaChi', header: 'Địa Chỉ' },
      { field: 'soDienThoai', header: 'Số Điện Thoại' },
      { field: 'email', header: 'Email' },
      { field: 'ghiChu', header: 'Ghi Chú' },
    ];
  }

  them() {
    this.newGroup = true;
    this.group = {};
    this.displayDialog = true;
  }
  save() {
    const groups = [...this.groups];
    console.log(this.group);
    if (this.newGroup) {
      groups.push(this.group);
    } else {
      groups[this.groups.indexOf(this.selectedgroup)] = this.group;
    }

    this.groups = groups;
    this.group = null;
    this.displayDialog = false;
    window.alert('Lưu Thành Công');

  }
  delete() {
    const index = this.groups.indexOf(this.selectedgroup);
    console.log(index);
    this.groups = this.groups.filter((val, i) => i !== index);
    this.group = null;
    this.displayDialog = false;
  }
  sua() {
      this.newGroup = false;
      // this.group = this.cloneCar(event.data);
      this.displayDialog = true;

    }

  onRowSelect(event) {
    this.newGroup = false;
    this.group = this.cloneCar(event.data);
    this.select = true;
    this.displayDialog = true;
  }
  xoa() {
    if ( this.select) {
      const index = this.groups.indexOf(this.selectedgroup);
      console.log(index);
      this.groups = this.groups.filter((val, i) => i !== index);
      this.group = null;
      this.displayDialog = false;
      this.select = false;
    } else {
      window.alert('Vui Lòng Chọn Bác Sĩ');
    }

  }
  cloneCar(c: Group): Group {
    const group = {};
    // tslint:disable-next-line:forin
    for (const prop in c) {
      group[prop] = c[prop];
    }
    return group;
  }

}
