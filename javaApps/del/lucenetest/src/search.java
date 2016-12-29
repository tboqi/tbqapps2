import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;

import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.analysis.standard.StandardAnalyzer;
import org.apache.lucene.document.Document;
import org.apache.lucene.index.CorruptIndexException;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.IndexWriter;
import org.apache.lucene.queryParser.QueryParser;
import org.apache.lucene.search.IndexSearcher;
import org.apache.lucene.search.Query;
import org.apache.lucene.search.Searcher;
import org.apache.lucene.store.Directory;
import org.apache.lucene.store.FSDirectory;
import org.apache.lucene.util.Version;


public class search {

	public static void main(String[] args) throws CorruptIndexException, IOException {
		Directory dir = FSDirectory.open(new File("d:\\indexnew"));
		Searcher searcher = new IndexSearcher(dir, true);
		Document doc = searcher.doc(0);
		System.out.println(doc);
		searcher.close();
	}
	
//	public ArrayList<Document> getQueryDate(String info)
//
//	   throws CorruptIndexException, IOException,
//
//	   org.apache.lucene.queryParser.ParseException {
//
//	  ArrayList<Document> doc = new ArrayList<Document>();
//
//	  String queryString = info;
//	  Hits hits = null;
//	  Query query = null;
//	  QueryParser qp = null;
//	  String dir = "c:\\hujiong"; // һ��Ҫ���㽨������λ�� һ��
//
//	  // ����������������
//	  IndexSearcher searcher = new IndexSearcher(dir);
//	  // �ִ���
//	  Analyzer analyzer = new StandardAnalyzer();
//	  qp = new QueryParser("content", analyzer);// ��������ֻд��һ����Content����.
//	  ������ӵ���title, ����
//	  query = qp.parse(queryString);
//	  if (searcher != null) {
//		  hits = searcher.search(query);
//		  doc = new ArrayList<Document>();
//		  for (int i = 0; i < hits.length(); i++) {
//			  doc.add(hits.doc(i));
//		  }
//	  }
//
//	  IndexSearcher searcher = new IndexSearcher("c:\\hujiong");
//
//	  Analyzer analyzer = new StandardAnalyzer();
//
//	  Query query = null;
//
//	  if (searcher != null) {
//
//	   // �ϲ����������ֶ�, ��ǿ�����������!!
//
//	   BooleanClause.Occur[] clauses = { BooleanClause.Occur.SHOULD,
//
//	     BooleanClause.Occur.SHOULD };
//
//	   query = MultiFieldQueryParser.parse(queryString, new String[] {
//
//	     "title", "content" }, clauses, analyzer);  // ���������������Χ�ڽ������� , ������Щ�������ֶα���Ҫ��������ݵ�������ʱ��������
//
//	   
//
//	   TopDocCollector collector = new TopDocCollector(5); // ���÷��ص������Ŀ���ͷ���ǰ100��
//
//	   
//
//	   searcher.search(query, collector);
//
//	   ScoreDoc[] hits1 = collector.topDocs().scoreDocs;
//
//	           // ���صĽ������һ������
//
//	   if (hits1.length > 0) {
//
//	    for (int i = 0; i < hits1.length; i++) {
//
//	     Document doc1 = searcher.doc(hits1[i].doc);
//
//	               // ���Ǵ�������ص������������ÿһ�����ݣ�  ����ֵ��Document
//
//	     doc.add(doc1);
//
//	     System.out.println(doc1.get("title") + "-----title");
//
//	     System.out.println(doc1.get("content") + "-------content");
//
//	    }
//
//	   } else {
//
//	    System.out.println("û������");
//
//	   }
//
//	  }
//
//	  return doc;
//
//	 }
}
