package com.mms.service;

import java.util.List;

import com.mms.pojo.Fix;

public interface IFixService {
      public void addFix(Fix fix);
      public List<Fix> findFixAll() ;
      public Fix findFixById(Integer id);
      public void updateFix(Fix fix) ;
}
