import os
import time
from mmdet.apis import inference_detector, init_detector

upload_dir = '/Users/cyy/cv_exhibition/upload'
result_dir = '/Users/cyy/cv_exhibition/result'
config = 'configs/faster_rcnn/faster_rcnn_r50_fpn_1x_coco.py'
checkpoint = 'faster_rcnn.pth'
model = init_detector(config, checkpoint, device='cpu')

def single_pic(upload,result):
    try:
        res = inference_detector(model, upload)
        model.show_result(upload,res,out_file=result)
    except:
        os.mknod(result)


def scan_dirs():
    uploaded = set()
    for file in os.listdir(upload_dir):
        if not os.path.isdir(file):
            uploaded.add(file)
    processed = set()
    for file in os.listdir(result_dir):
        if not os.path.isdir(file):
            processed.add(file)
    need_to_do = uploaded - processed
    for x in need_to_do:
        single_pic(upload_dir+'/'+x,result_dir+'/'+x)
    
while True:
    scan_dirs()
    time.sleep(1)
    