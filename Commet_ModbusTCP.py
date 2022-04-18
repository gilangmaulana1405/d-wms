from pyModbusTCP.client import ModbusClient
import time
import requests

DEVICE = "10.175.14.204"

# TCP auto connect on first modbus request
# c = ModbusClient(host="localhost", port=502, auto_open=True)


# TCP auto connect on modbus request, close after it
c = ModbusClient(host=DEVICE, auto_open=True, auto_close=True)

c = ModbusClient()
c.host(DEVICE)
c.port(502)
# managing TCP sessions with call to c.open()/c.close()
c.open()

temp_addr = 0x0030
rh_addr = 0x0031

while True:
    print("read Temp")
    regs = c.read_holding_registers(temp_addr)
    if regs:
        data_suhu = regs[0]/10
        print(data_suhu,"⁰C")
        try:
            print ("kirim data Temp")
            send_data = requests.post("http://127.0.0.1/monitoring/index.php/api/suhu", data={'suhu':data_suhu}, timeout=1)
            print(send_data)
            print(send_data.text)
        except:
            print("error kirim data")
        print()
    else:
        print("read error")
    time.sleep(1)

    print("read RH")
    regs = c.read_holding_registers(rh_addr)
    if regs:
        data_rh = regs[0]/10
        print(data_rh,"%")
        try:
            print ("kirim data RH")
            send_data = requests.post("http://127.0.0.1/monitoring/index.php/api/rh", data={'rh':data_rh}, timeout=1)
            print(send_data)
            print(send_data.text)
        except:
            print("error kirim data")
        print()
    else:
        print("read error")

    time.sleep(1)
