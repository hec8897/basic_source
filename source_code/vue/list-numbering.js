
import eventBus from './eventbus.js'

const listNumber = {
    props: ['DataLength','nowpage'],
    template: `<div class="page">
                <span class="none" v-if="start === 1"><i class="material-icons vam">navigate_before</i></span>
                <span v-else v-on:click='FrontList'><i class="material-icons vam">navigate_before</i></span>

                <span class="nobtn" v-for = "j in limit" v-if = 'j <= limit && j >= start' v-on:click='NextPage(j,j+1)'>{{j}}</span>

                <span v-on:click='NextList' v-if='DataLength > 10 && limit < DataLength '><i class="material-icons vam">navigate_next</i></span>
                <span class='none' v-else><i class="material-icons vam">navigate_next</i></span>

            </div>`,
    data(){
        return{
            thisNumber:null,
            thisIndex:0,
            start:1,
            limit:10,
            lists:null              
        }
    },
    created(){

        this.thisNumber = this.DataLength
        if(this.DataLength <= 10){
            this.limit = this.DataLength
        }
        eventBus.$on('ListLength',(Data)=>{
        })

        eventBus.$on('UpdateList',(Data)=>{
            this.limit = Data.DataLength;
            this.thisNumber = Data.nowpage
        })

    },
    mounted(){
        this.thisNumber = this.nowpage
        const NoBtn = document.querySelectorAll('.nobtn')
        if(NoBtn.length>0){
            NoBtn[0].className = 'nobtn on'
        }
    },
    updated(){
        const NoBtn = document.querySelectorAll('.nobtn')
        if(NoBtn.length>0){
            NoBtn[0].className = 'nobtn on'
        }

    },
    methods:{
        ActivationBtn(j){

            const NoBtn = document.querySelectorAll('.nobtn')
            const LimitNo = this.limit - 10;
            for(let i = 0; i < NoBtn.length; i++){
                NoBtn[i].className = 'nobtn'
            }

            if(this.limit == this.DataLength){
                NoBtn[j%10-1].className = 'nobtn on'
            }
            
            else{
                NoBtn[j-1-LimitNo].className = 'nobtn on'
            }
        },
        NextPage(i,ThisIndex){
            if(this.thisIndex+1 < ThisIndex){
                this.thisNumber+=10;
                this.thisIndex = i
                this.ActivationBtn(i)
            }
            else if(this.thisIndex+1 > ThisIndex){
                this.thisNumber-=10;
                this.thisIndex = i
                this.ActivationBtn(i)
            }
            eventBus.$emit('NextPage',i-1)    

        },
        NextList(){
            this.start+=10;
            if(this.limit+10 > this.DataLength){
                this.limit = this.DataLength
                
            }
            else{
                this.limit+=10;
                this.ActivationBtn(this.start)
            }
            this.NextPage(this.start,this.start+1)

        },
        FrontList(){
            
            this.start-=10;
            this.limit = Math.ceil((this.limit-10)/10)*10

            if(this.start == 1){
                this.limit = 10;
            }

            this.NextPage(this.start,this.start+1)
            this.ActivationBtn(this.start)

        }

    }
  
}

export default listNumber;