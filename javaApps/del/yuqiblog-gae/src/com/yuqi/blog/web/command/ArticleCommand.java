package com.yuqi.blog.web.command;

import java.util.Date;

import com.google.appengine.api.datastore.Text;
import com.yuqi.blog.domain.Article;

public class ArticleCommand {

	private Long id;
	private String title;
	private String content;
	private Date createTime;
	private Long categoryId;
	
	public Article toArticle() {
		Article a = new Article();
		a.setCategoryId(categoryId);
		a.setContent(new Text(content));
		a.setCreateTime(createTime);
		a.setId(id);
		a.setTitle(title);
		return a;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getContent() {
		return content;
	}

	public void setContent(String content) {
		this.content = content;
	}

	public Date getCreateTime() {
		return createTime;
	}

	public void setCreateTime(Date createTime) {
		this.createTime = createTime;
	}

	public Long getCategoryId() {
		return categoryId;
	}

	public void setCategoryId(Long categoryId) {
		this.categoryId = categoryId;
	}
}
