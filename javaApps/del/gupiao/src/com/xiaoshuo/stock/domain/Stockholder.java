package com.xiaoshuo.stock.domain;

/**
 * @author �Ʋ���
 */
public class Stockholder {

	private int id;

	private String stockNum;

	private String holderName;// �ֹ���

	private String stockCount;// ������(���)

	private String stockScale;// ����

	private String stockKind;// ��Ʊ����

	public String toString() {
		return "stockNum=" + stockNum + " holderName=" + holderName
				+ " stockCount=" + stockCount + " stockScale=" + stockScale
				+ " stockKind=" + stockKind;
	}

	public String getHolderName() {
		return holderName;
	}

	public void setHolderName(String holderName) {
		this.holderName = holderName;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getStockCount() {
		return stockCount;
	}

	public void setStockCount(String stockCount) {
		this.stockCount = stockCount;
	}

	public String getStockKind() {
		return stockKind;
	}

	public void setStockKind(String stockKind) {
		this.stockKind = stockKind;
	}

	public String getStockNum() {
		return stockNum;
	}

	public void setStockNum(String stockNum) {
		this.stockNum = stockNum;
	}

	public String getStockScale() {
		return stockScale;
	}

	public void setStockScale(String stockScale) {
		this.stockScale = stockScale;
	}
}
