import { Component, OnInit } from '@angular/core';
import { EmployeeService } from '../../shared/employee.service';
import { Employee } from 'src/app/model/employee.model';

@Component({
  selector: 'app-employee-list',
  templateUrl: './employee-list.component.html',
  styleUrls: ['./employee-list.component.css']
})
export class EmployeeListComponent implements OnInit {

  allEmployee: Employee[];
  constructor(
    private employeeService: EmployeeService
  ) { }

  ngOnInit() {
    this.getAllEmployee();
  }

  getAllEmployee(){
    this.employeeService.getAllEnployees().subscribe(
      (data:Employee[]) => {
        this.allEmployee = data;
      });
  }

  deleteEmployee(id:number){
    console.log(id);
    this.employeeService.deleteEmployee(id).subscribe(
      (data: Employee)=>{
        this.getAllEmployee();
      });
  }



}



