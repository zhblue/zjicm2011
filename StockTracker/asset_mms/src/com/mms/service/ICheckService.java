package com.mms.service;

import java.util.List;

import com.mms.pojo.Asset;

public interface ICheckService {
	public List<Asset> serchAll(Asset filter);
}
