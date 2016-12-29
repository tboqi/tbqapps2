DELIMITER $$

DROP PROCEDURE IF EXISTS `cw`.`vote` $$
CREATE DEFINER=`root`@`%` PROCEDURE `vote`()
   
BEGIN
     DECLARE articleId int(10);
     DECLARE sCount int(10);
     DECLARE usCount int(10);
     DECLARE vCategory varchar(10);
     DECLARE totalWinNum int(10);
     DECLARE totalLoseNum int(10);
     DECLARE avgNum float;
     DECLARE done INT DEFAULT 0;


     /*declare the cursor for which got to the End day and the state = 0 in article*/
     DECLARE CUR1 CURSOR FOR   SELECT Id,SupportCount,UnSupportCount
                               FROM cw.article WHERE   EndDate < NOW() AND
                               State = 0;

     DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

     OPEN CUR1;

          REPEAT
                FETCH CUR1 INTO articleId,sCount,usCount;
                IF NOT done THEN
                   #UPDATE article  SET State = 1 WHERE Id = articleId;/** update the state  **/
                   select articleId;
                   IF sCount > usCount THEN
                      SET  vCategory = 'Support';
                      SELECT SUM(VoteNumber) into totalWinNum FROM vote WHERE
                      ResourceId=articleId AND VoteCategory='Support' AND
                      ResourceType='Article';
                      SELECT SUM(VoteNumber) into totalLoseNum FROM vote WHERE
                      ResourceId=articleId AND VoteCategory='Unsupport' AND
                      ResourceType='Article';

                      SET avgNum =  (totalWinNum +  totalLoseNum ) /  totalWinNum ;
                      
                   ELSEIF sCount < usCount THEN
                      SET  vCategory = 'UnSupport';
                      SELECT SUM(VoteNumber) INTO totalWinNum FROM vote WHERE
                      ResourceId=articleId AND VoteCategory='Unsupport' AND
                      ResourceType='Article';
                      SELECT SUM(VoteNumber) INTO totalLoseNum FROM vote WHERE
                      ResourceId=articleId AND VoteCategory='Support' AND
                      ResourceType='Article';
                   ELSE
                      SET vCategory = '' ;/*֧���뷴�����*/
                END IF;

                IF vCategory <> '' THEN /*�ֳ�ʤ������Ҫ�ж�һ���Ƿ�Ϊ0*/
                   IF totalWinNum = 0 THEN
                      SET avgNum = 1;
                   ELSE
                       SET avgNum =  (totalWinNum +  totalLoseNum ) /
                       totalWinNum;
                   END IF;

                   CALL cw.sub_vote(articleId,vCategory,avgNum , 0);/* �����Ӵ洢���� */
                ELSE /*û�зֳ�ʤ������������*/
                     SELECT 'draw';
                   CALL cw.sub_vote(articleId,vCategory,avgNum , 1);/* ƽ�ִ��� */
                END IF;
           END IF;
   UNTIL done END REPEAT;
     CLOSE CUR1;
END $$

DELIMITER ;