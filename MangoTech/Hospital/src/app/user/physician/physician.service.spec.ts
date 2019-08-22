import { TestBed } from '@angular/core/testing';

import { PhysicianService } from './physician.service';

describe('PhysicianService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PhysicianService = TestBed.get(PhysicianService);
    expect(service).toBeTruthy();
  });
});
