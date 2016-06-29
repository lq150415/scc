set FECHA= %date%
set FECHA=%FECHA:/=%
set FECHA=%FECHA: =%
set FECHA=%FECHA::=%
set FECHA=%FECHA:,=%
set BD=c:/xampp/htdocs/scc/log/backup_scc_%FECHA%.sql
cd c:/xampp/mysql/bin
mysqldump --user=root --host=localhost db_sccventas > %BD%
