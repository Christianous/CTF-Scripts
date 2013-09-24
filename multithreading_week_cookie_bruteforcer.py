#!/usr/bin/env python
import subprocess

i_start=10000000
i_end=  10000000000
num_cpu_cores = 60*2 #cpu core
range_for_one_cpu = (i_end-i_start)/num_cpu_cores
for p in range(0,num_cpu_cores):
        tmp_start = p*range_for_one_cpu
        tmp_end = (p+1)*range_for_one_cpu
        subprocess.Popen(['nohup', 'php','./weak_cookie_bruteforcer.php', str(tmp_start), str(tmp_end)],
                stdout=open('/dev/null', 'w'),
                stderr=open('log_%d.log' % p, 'a'))
