@echo off

echo �������ϵͳ�����ļ������Ե�......

del /f /s /q %systemdrive%*.tmp

del /f /s /q %systemdrive%*._mp

del /f /s /q %systemdrive%*.log

del /f /s /q %systemdrive%*.gid

del /f /s /q %systemdrive%*.chk

del /f /s /q %systemdrive%*.syd

del /f /s /q %systemdrive%*.$$$

del /f /s /q %systemdrive%*.@@@

del /f /s /q %systemdrive%*.~*

del /f /s /q %systemdrive%*.gts

del /f /s /q %systemdrive%*.bak

del /f /s /q %systemdrive%*.old

del /f /s /q %systemdrive%*.wbk

del /f /s /q %systemdrive%*.xlk

del /f /s /q %systemdrive%*.ckr_

del /f /s /q %windir%prefetch*.*

rd /s /q %windir%temp

echo ���ϵͳ�������!

echo. & pause