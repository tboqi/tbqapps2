<?php

$lang = array
(
	'file_not_found' => 'ָ���ļ� %s �����ڡ�����ʹ��֮ǰʹ�� file_exists() ����ȷ���ļ��Ƿ���ڡ�',
	'requires_GD2'   => '��֤�루Captcha������Ҫ�� FreeType �� GD2 ֧�֡������뿴 http://php.net/gd_info ��',

	// Ϊ Captcha_Word_Driver ѡ��ͬ���ȵ��ַ�
	// ע�⣺��ʹ����ĸ�ַ�ʱ
	'words' => array
	(
		'cd', 'tv', 'it', 'to', 'be', 'or',
		'sun', 'car', 'dog', 'bed', 'kid', 'egg',
		'bike', 'tree', 'bath', 'roof', 'road', 'hair',
		'hello', 'world', 'earth', 'beard', 'chess', 'water',
		'barber', 'bakery', 'banana', 'market', 'purple', 'writer',
		'america', 'release', 'playing', 'working', 'foreign', 'general',
		'aircraft', 'computer', 'laughter', 'alphabet', 'kangaroo', 'spelling',
		'architect', 'president', 'cockroach', 'encounter', 'terrorism', 'cylinders',
	),

	// Ϊ Captcha_Word_Driver ѡ��ͬ������
	// ע�⣺��ʹ����ĸ�ַ�ʱ
	'riddles' => array
	(
		array('���������� SPAM �𣿣��ǻ��ǣ�', '��'),
		array('���ǻ������𣿣��ǻ��ǣ�', '��'),
		array('����... ���ȵ� ���� ��ģ�', '�ȵ�'),
		array('�＾֮����ʲô���ڣ�', '����'),
		array('���������ܵ���һ��?', strftime('%A')),
		array('�����Ǽ��·ݣ�', strftime('%B')),
	),
);
