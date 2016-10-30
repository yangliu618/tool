### 起因: 不小新把记录了公司服务器IP,账号,密码的文件提交到了git,要删除该提交记录，并且在log里看不到该记录

### 方法:
* git reset --hard <commit_id>
* git push origin HEAD --force


### 其他根据 –soft –mixed –hard，会对working tree和index和HEAD进行重置:
* git reset –mixed：此为默认方式，不带任何参数的git reset，即是这种方式，它回退到某个版本，只保留源码，回退commit和index信息
* git reset –soft：回退到某个版本，只回退了commit的信息，不会恢复到index file一级。如果还要提交，直接commit即可
* git reset –hard：彻底回退到某个版本，本地的源码也会变为上一个版本的内容

 HEAD 最近一个提交
 HEAD^ 上一次
 <commit_id> 每次commit的SHA1值. 可以用git log 看到,也可以在页面上commit标签页里找到


 git reset –soft命令，只是撤销了commit的提交记录，commit改动的代码仍然存在，很受用。
 git reset --soft commit-id,其中的commit-id指的是撤销之前的那个commit id.


### git代码库回滚: 指的是将代码库某分支退回到以前的某个commit id
###【本地代码库回滚】：
* git reset --hard commit-id :回滚到commit-id，讲commit-id之后提交的commit都去除
* git reset --hard HEAD~3：将最近3次的提交回滚



