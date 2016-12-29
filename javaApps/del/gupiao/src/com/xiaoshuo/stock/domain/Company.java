package com.xiaoshuo.stock.domain;

public class Company {

	private int id;

	private String fullName;

	private String stockName;

	private String stockNum;

	private String tocalStock;//�ܹɱ�

	private String currentStock;// ��ͨ��

	private String publishDate; // ��������

	private String marketDate; // ��������

	private String industry; // ��ҵ

	private String area; // ����

	private String taxRate; // ˰��

	private String corporateRepresentative; // ���˴���

	private String linkman;// ��ϵ��

	private String mainUnderwriter; // ��������

	private String address;

	private String postalcode;// ��������

	private String tele;// ��˾�绰

	private String fax;// ����

	private String email;

	private String comUrl;// ��˾��ַ

	private String scopeOfBusiness;// ��Ӫ��Χ

	private String product;// ��˾��Ʒ

	private String description;

	public String getAddress() {
		return address;
	}

	public void setAddress(String address) {
		this.address = address;
	}

	public String getArea() {
		return area;
	}

	public void setArea(String area) {
		this.area = area;
	}

	public String getComUrl() {
		return comUrl;
	}

	public void setComUrl(String comUrl) {
		this.comUrl = comUrl;
	}

	public String getCorporateRepresentative() {
		return corporateRepresentative;
	}

	public void setCorporateRepresentative(String corporateRepresentative) {
		this.corporateRepresentative = corporateRepresentative;
	}

	public String getCurrentStock() {
		return currentStock;
	}

	public void setCurrentStock(String currentStock) {
		this.currentStock = currentStock;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getFax() {
		return fax;
	}

	public void setFax(String fax) {
		this.fax = fax;
	}

	public String getFullName() {
		return fullName;
	}

	public void setFullName(String fullName) {
		this.fullName = fullName;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getIndustry() {
		return industry;
	}

	public void setIndustry(String industry) {
		this.industry = industry;
	}

	public String getLinkman() {
		return linkman;
	}

	public void setLinkman(String linkman) {
		this.linkman = linkman;
	}

	public String getMainUnderwriter() {
		return mainUnderwriter;
	}

	public void setMainUnderwriter(String mainUnderwriter) {
		this.mainUnderwriter = mainUnderwriter;
	}

	public String getMarketDate() {
		return marketDate;
	}

	public void setMarketDate(String marketDate) {
		this.marketDate = marketDate;
	}

	public String getPostalcode() {
		return postalcode;
	}

	public void setPostalcode(String postalcode) {
		this.postalcode = postalcode;
	}

	public String getProduct() {
		return product;
	}

	public void setProduct(String product) {
		this.product = product;
	}

	public String getPublishDate() {
		return publishDate;
	}

	public void setPublishDate(String publishDate) {
		this.publishDate = publishDate;
	}

	public String getScopeOfBusiness() {
		return scopeOfBusiness;
	}

	public void setScopeOfBusiness(String scopeOfBusiness) {
		this.scopeOfBusiness = scopeOfBusiness;
	}

	public String getStockName() {
		return stockName;
	}

	public void setStockName(String stockName) {
		this.stockName = stockName;
	}

	public String getStockNum() {
		return stockNum;
	}

	public void setStockNum(String stockNum) {
		this.stockNum = stockNum;
	}

	public String getTaxRate() {
		return taxRate;
	}

	public void setTaxRate(String taxRate) {
		this.taxRate = taxRate;
	}

	public String getTele() {
		return tele;
	}

	public void setTele(String tele) {
		this.tele = tele;
	}

	public String getTocalStock() {
		return tocalStock;
	}

	public void setTocalStock(String tocalStock) {
		this.tocalStock = tocalStock;
	}
}
