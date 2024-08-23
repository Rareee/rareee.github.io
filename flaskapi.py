from flask import *
def yes(info):#Di sini Anda meletakkan apa yang Anda ambil dari pengguna di antara tanda kurung dan Anda dapat menambahkan apa yang Anda inginkan
	#Recostat atau kode apa pun yang Anda inginkan
	#Di sini Anda meletakkan komunikasi atau apa pun yang ingin Anda tetapkan kondisinya dan membuat perubahan untuk mengembalikan nilainya
	return "memek"
app = Flask(__name__)
@app.route("/rrq")
def nic():
	z = request.args.get('user1')#Anda dapat membuat variabel dan melakukan hal yang sama 
	return yes(z)#Anda dapat menambahkan lebih banyak di sini
if __name__=='__main__':
	app.run(debug=True)	
	
#O_B_I1
#Salam sejahtera, hari ini kami akan menjelaskan template Flask