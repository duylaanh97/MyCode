import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AouPhysicianComponent } from './aou-physician.component';

describe('AouPhysicianComponent', () => {
  let component: AouPhysicianComponent;
  let fixture: ComponentFixture<AouPhysicianComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AouPhysicianComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AouPhysicianComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
