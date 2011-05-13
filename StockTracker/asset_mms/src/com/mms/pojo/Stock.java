package com.mms.pojo;
// default package



/**
 * Stock entity. @author MyEclipse Persistence Tools
 */

public class Stock  implements java.io.Serializable {


    // Fields    

     private Integer stockId;
     private String stockName;
     private String stockCode;
     private String stockInfo;


    // Constructors

    /** default constructor */
    public Stock() {
    }

    
    /** full constructor */
    public Stock(String stockName, String stockCode, String stockInfo) {
        this.stockName = stockName;
        this.stockCode = stockCode;
        this.stockInfo = stockInfo;
    }

   
    // Property accessors

    public Integer getStockId() {
        return this.stockId;
    }
    
    public void setStockId(Integer stockId) {
        this.stockId = stockId;
    }

    public String getStockName() {
        return this.stockName;
    }
    
    public void setStockName(String stockName) {
        this.stockName = stockName;
    }

    public String getStockCode() {
        return this.stockCode;
    }
    
    public void setStockCode(String stockCode) {
        this.stockCode = stockCode;
    }

    public String getStockInfo() {
        return this.stockInfo;
    }
    
    public void setStockInfo(String stockInfo) {
        this.stockInfo = stockInfo;
    }
   








}